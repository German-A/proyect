<?php

class Login extends Controllers
{
	public function __construct()
	{
		session_start();
		if (isset($_SESSION['login'])) {
			header('Location: ' . base_url() . '/dashboard');
		}
		parent::__construct();
	}

	public function login()
	{
		$data['page_tag'] = "Login - U.S.E.";
		$data['page_title'] = "Unidad de Seguimiento del Egresado";
		$data['page_name'] = "login";
		$data['page_functions_js'] = "functions_login.js";
		$this->views->getView($this, "login", $data);
	}

	public function loginUser()
	{
		//dep($_POST);
		if ($_POST) {
			if (empty($_POST['txtEmail']) || empty($_POST['txtPassword'])) {
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			} else {

				$strUsuario  =  strtolower(strClean($_POST['txtEmail']));
				$usuario = $this->model->buscarCorreo($strUsuario);

				if (empty($usuario)) {
					$arrResponse = array('status' => false, 'msg' => 'El correo no se encuentra Registrado');
				} else {
					if ($usuario['intentos'] == 5) {
						$arrResponse = array('status' => false, 'msg' => 'Usuario inactivo, se encuentra bloqueado.');
					} else {

						$strUsuario  =  strtolower(strClean($_POST['txtEmail']));
						$strPassword = $_POST['txtPassword'];
						$arrData = $this->model->loginUser($strUsuario, $strPassword);
						if (empty($arrData)) {
							
							if($usuario['intentos'] < 5){
								$idpersona=$usuario['idpersona'];
								$numerointentos=$usuario['intentos'] + 1;	
								$arrData = $this->model->intentos($idpersona,$numerointentos);
							}
							$intentosrestantes = 5 - $usuario['intentos'] ;


							$arrResponse = array('status' => false, 'msg' => 'La contraseña es incorrecto (te quedan '. $intentosrestantes.' intentos.).');

						} else {

							if ($arrData['status'] == 1) {

								$arrResponse = array(
									'status' => true,
									'msg' => 'ok'
								);

								$_SESSION['idUser'] = $arrData['idpersona'];
								$_SESSION['login'] = true;

								$arrData = $this->model->sessionLogin($_SESSION['idUser']);

								$_SESSION['userData'] = $arrData;

								if ($arrData['idrol'] == 4) {
									$arrEmp = $this->model->sessionEmpresa($_SESSION['idUser']);
									$_SESSION['Empresario'] = $arrEmp['idempresa'];
								}

								if ($arrData['idrol'] == 3) {
									$arrEmp = $this->model->sessionEgresado($_SESSION['idUser']);
									$_SESSION['Egresado'] = $arrEmp['idegresado'];
								}
							} elseif ($arrData['status'] == 3) {
								$arrResponse = array('status' => false, 'msg' => 'Usuario bloqueado, por superar el numero de intentos (dar click en "¿Olvidaste tu contraseña?").');
							} else {
								$arrResponse = array('status' => false, 'msg' => 'Usuario inactivo, envíanos un mensaje desde la parte final de la sección inicio.');
							}
						}
					}
				}
			}

			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function resetPass()
	{
		if ($_POST) {
			error_reporting(0);

			if (empty($_POST['txtEmailReset'])) {
				$arrResponse = array('status' => false, 'msg' => 'Error de datos');
			} else {
				$token = token();
				$strEmail  =  strtolower(strClean($_POST['txtEmailReset']));
				$arrData = $this->model->getUserEmail($strEmail);

				if (empty($arrData)) {
					$arrResponse = array('status' => false, 'msg' => 'Usuario no existente.');
				} else {
					$idpersona = $arrData['idpersona'];
					$nombreUsuario = $arrData['nombres'] . ' ' . $arrData['apellidos'];

					$url_recovery = base_url() . '/login/confirmUser/' . $strEmail . '/' . $token;
					$requestUpdate = $this->model->setTokenUser($idpersona, $token);


					$dataUsuario = array(
						'nombreUsuario' => $nombreUsuario,
						'email' => $strEmail,
						'asunto' => 'Recuperar cuenta - ' . NOMBRE_REMITENTE,
						'url_recovery' => $url_recovery
					);
					if ($requestUpdate) {

						$sendEmail = sendMailLocal($dataUsuario, 'email_cambioPassword');

						if (sendMailLocal($dataUsuario, 'email_cambioPassword')) {
							$arrResponse = array(
								'status' => true,
								'msg' => 'Se ha enviado un email a tu cuenta de correo para cambiar tu contraseña.'
							);
						} else {
							$arrResponse = array(
								'status' => false,
								'msg' => 'No es posible realizar el proceso, intenta más tarde.'
							);
						}
					} else {
						$arrResponse = array(
							'status' => false,
							'msg' => 'No es posible realizar el proceso de envio, intenta más tarde.'
						);
					}
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function confirmUser(string $params)
	{

		if (empty($params)) {
			header('Location: ' . base_url());
		} else {
			$arrParams = explode(',', $params);
			$strEmail = strClean($arrParams[0]);
			$strToken = strClean($arrParams[1]);
			$arrResponse = $this->model->getUsuario($strEmail, $strToken);
			if (empty($arrResponse)) {
				header("Location: " . base_url());
			} else {
				$data['page_tag'] = "Cambiar contraseña";
				$data['page_name'] = "cambiar_contrasenia";
				$data['page_title'] = "Cambiar Contraseña";
				$data['email'] = $strEmail;
				$data['token'] = $strToken;
				$data['idpersona'] = $arrResponse['idpersona'];
				$data['page_functions_js'] = "functions_login.js";
				$this->views->getView($this, "cambiar_password", $data);
			}
		}
		die();
	}

	public function setPassword()
	{



		if (empty($_POST['idUsuario']) || empty($_POST['txtEmail']) || empty($_POST['txtToken']) || empty($_POST['txtPassword']) || empty($_POST['txtPasswordConfirm'])) {

			$arrResponse = array(
				'status' => false,
				'msg' => 'Error de datos'
			);
		} else {
			$intIdpersona = intval($_POST['idUsuario']);
			$strPassword = $_POST['txtPassword'];
			$strPasswordConfirm = $_POST['txtPasswordConfirm'];
			$strEmail = strClean($_POST['txtEmail']);
			$strToken = strClean($_POST['txtToken']);

			if ($strPassword != $strPasswordConfirm) {
				$arrResponse = array(
					'status' => false,
					'msg' => 'Las contraseñas no son iguales.'
				);
			} else {
				$arrResponseUser = $this->model->getUsuario($strEmail, $strToken);
				if (empty($arrResponseUser)) {
					$arrResponse = array(
						'status' => false,
						'msg' => 'Erro de datos.'
					);
				} else {
					$strPassword = $strPassword;
					$requestPass = $this->model->insertPassword($intIdpersona, $strPassword);

					if ($requestPass) {
						$arrResponse = array(
							'status' => true,
							'msg' => 'Contraseña actualizada con éxito.'
						);
					} else {
						$arrResponse = array(
							'status' => false,
							'msg' => 'No es posible realizar el proceso, intente más tarde.'
						);
					}
				}
			}
		}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		die();
	}
}
