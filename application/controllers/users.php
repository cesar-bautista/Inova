<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("users_model","users");
	}

	public function menu()
	{
		$user = AUTHORIZATION::validateToken();
		if(is_object($user))
		{
			$menu = $this->users->get_menu($user->userId, $user->email);
			$items = $this->build_menu($menu, 0);

			echo json_encode(
				array(
					"code" => 1, 
					"response" => array(
						"menu"=> $items
					)
				)
			);
		}
	}

	//Este código meterlo en un helper
	function build_menu($rows, $parent)
    {
        $result = array();
        foreach ($rows as $row)
        {
			if ($row['ParentId'] == $parent)
			{
                $item = array( 
                    "id" => $row["MenuId"],
					"title" => $row["Title"],
					"group" => $row["Group"],
                    "url" => $row["Url"],
                    "icon" => $row["Icon"],
                    "nodes" => array());

                if ($this->has_children($rows, $row['MenuId']))
                    $item["nodes"] = $this->build_menu($rows, $row['MenuId']);
                
                $result[] = $item;


            }
        }

        return $result;
	}
	
    function has_children($rows, $id)
    {
        foreach ($rows as $row) {
            if ($row['ParentId'] == $id)
            return true;            
        }
        return false;
    }
}