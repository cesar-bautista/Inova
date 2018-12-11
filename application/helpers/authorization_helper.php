<?php
class AUTHORIZATION
{
    const HTTP_OK = 200;
    const HTTP_BAD_REQUEST = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_PAYMENT_REQUIRED = 402;

    public static function validateToken()
    {
        $http_code = self::HTTP_OK;
        $CI =& get_instance();
        $CI->output->set_status_header($http_code);
        $headers = apache_request_headers();
        $message = "Es necesario volver a iniciar sesión";
        if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {
            $token = explode(" ", $headers["Authorization"]);
            $decodedToken = self::decodeToken(trim($token[1],'"'));
            if ($decodedToken != false) {
                $validatedToken = self::validateExpired($decodedToken);
                if ($validatedToken != false) {
                    $validatedUser = self::validateUser($validatedToken);
                    if($validatedUser == true){
                        return $validatedToken;
                    }
                    else{ $message = "Usuario inválido"; $http_code = self::HTTP_PAYMENT_REQUIRED; }
                }
                else{ $message = "Token expidado"; $http_code = self::HTTP_UNAUTHORIZED; }
            }
            else{ $message = "Token inválido"; $http_code = self::HTTP_BAD_REQUEST; }
        }
        else{ $message = "Token no encontrado"; $http_code = self::HTTP_BAD_REQUEST; }
        
        $CI->output->set_status_header($http_code);
        echo json_encode(array("code" => 0, "response" => $message));
    }

    public static function loginUser($email, $password)
    {
        $CI =& get_instance();
        $CI->load->model("auth_model", "auth");
        return $CI->auth->login($email, $password);
    }

    public static function validateUser($user)
    {
        $CI =& get_instance();
        $CI->load->model("auth_model", "auth");
        return $CI->auth->checkUser($user->userId, $user->email);
    }

    public static function validateExpired($token)
    {
        $CI =& get_instance();
        if ($token != false && (now() < $token->exp)) {
            return $token;
        }
        return false;
    }

    public static function decodeToken($token)
    {
        $CI =& get_instance();
        return JWT::decode($token, $CI->config->item('jwt_key'));
    }
    
    public static function encodeToken($data)
    {
        $CI =& get_instance();
        $data->exp = now() + ($CI->config->item('token_timeout') * 60);
        return JWT::encode($data, $CI->config->item('jwt_key'));
    }    
}