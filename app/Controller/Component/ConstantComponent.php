<?php
/**
 * Created by IDEA.
 * User: Rajesh
 * Date: Oct 16, 2010
 * Time: 8:01:53 PM
 * To change this template use File | Settings | File Templates.
 * class: "ConstantComponent" contain
 * var
 * <p>$name string
 * $user_name_role string
 * $quality  int
 * $user_image_height  int
 * $user_image_width  int
 * $user_image_path  string
 * $components  array
 * $display_message  string
 * </p>
 * function
 * <p> "get_gender" function return array of gender
 * "get_session_user_id" function return session user id
 * "get_session_user_name" function return session user name
 * "get_session_user_role" function return session user role
 * </p>
 *
 */

class ConstantComponent extends Component
{

    /**
     * <p> var name contain name of component ConstantComponent" </p>
     */
    var $name = "Constant";

    /**
     * followings are constants used in this application
     */
    /**
     * @var string
     * <p> string contain "USER_NAME_ROLE"
     * </p>
     */
    var $user_name_role = "USER_NAME_ROLE";

    /**
     * @var int
     * <p> int contain quality of resize image </p>
     */
    var $quality = 50;

    /**
     * @var int
     * <p> int contain width of resize image </p>
     */
    var $s_130 = 130;

    /**
     * @var int
     * <p> int contain height of resize image </p>
     */
    var $s_160 = 160;

    var $s_250 = 250;

    var $s_100 = 100;

    /**
     * @var string
     * <p> string contain root path of user profile image</p>
     */
//    var $image_path = "/home/ginfo819/public_html/cakeapp3_data/categories/";
 //   var $image_path_ads = "/home/ginfo819/public_html/cakeapp3_data/ads/";
//	var $image_path1 = "/home/ginfo819/public_html/cakeapp3_data/loyalties/";
//	var $image_path_company = "/home/ginfo819/public_html/cakeapp3_data/companies/";
//    var $temp_image_path = "/home/ginfo819/public_html/files/temp/";
    var $contact_us_file = "files/Contacts/";
    var $order_temporary_file = "files/Order/Temporary/";
    var $order_file = "files/Order/Files/";
    var $product_image = "files/Products/";
    var $bond_image = "files/Bonds/";
    var $blog_image = "files/Blogs/";
    /**
     * @var array components array to be used
     */
    var $s_600 = 600;

    var $s_500 = 500;

    var $s_138 = 138;

    var $s_104 = 104;

    function create_dir($path)
    {
        try {
            if (!is_dir($path)) {
                mkdir($path, 0705, true);
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    function get_file_name_without_ext($file_name)
    {
        try {
            $file = new File($file_name);
            $ext = $file->ext();
            $file_name = str_replace("." . $ext, "", $file_name);
            return $file_name;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function get_proper_file_name($file_name)
    {
        try {
            $file_name = trim($file_name);
            $search = array(" ", "+", "(", ")");
            $file_name = str_replace($search, '_', $file_name);
            return $file_name;
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }

    public function get_image_resize_height($file, $width)
    {
        try {
            $file_name = $file["name"];
            if (!empty ($file_name)) {
                list($image_width, $image_height, $image_type, $image_attr) = getimagesize($file["tmp_name"]);
                return intval(($image_height * $width) / $image_width);
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
