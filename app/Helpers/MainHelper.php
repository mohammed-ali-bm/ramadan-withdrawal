<?php

use PhpParser\Node\Expr\FuncCall;

function get_card_status_label($status)
{

    if ($status == "") {
        return "لم يتم الطلب ";
    } else if ($status == "PENDING") {
        return "بإنتظار الموافقة";
    } else if ($status == "REJECTED") {
        return "مرفوض";
    } else if ($status == "CONFIRMED") {
        return "مقبول ";
    }
}




function processMobile($mobile)
{
    if (strpos($mobile, "00") === 0) {
        $mobile = substr($mobile, 2);
    } elseif (strpos($mobile, "+") === 0) {
        // $mobile = substr($mobile, 1);
    } else {
        $mobile = "+967" . $mobile;
    }

    return $mobile;
}

function generateToken($n = 16)
{

    $token = openssl_random_pseudo_bytes($n);

    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);

    //Print it out for example purposes.
    return $token;
}


function generateOTP()
{

    // return 5555;

    return rand(1000, 9999);
}

function get_option($key)
{


    return @config('settings.' . $key);
}

function getOption($key)
{

    return @config('settings.' . $key);
}





function countries()
{


    return @config('countries');
}
function get_gender_text($gender)
{

    if ($gender == "male") {
        return "ذكر";
    } else if ($gender == "female") {
        return "انثى";
    }
    return "غير محدد ";
}


function hasPer($per)
{

    if (auth()->guard("admin")->check() && str_contains(strtoupper(auth()->guard("admin")->user()->permissions),  strtoupper($per))) {
        return true;
    }

    return false;
}

function check_permation($per)
{



    return hasPer($per);
}


function convertToEnglishNumbers($string)
{


    return strtr($string, array('۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9', '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'));
}

function check_mobile_number($number)
{

    $numberLen = strlen($number);


    if ($numberLen == 10 && substr($number, 0, 2) . "" == "05") {


        return substr($number, -9);
    } else if (intval(substr($number, 0, 1)) == 5 and strlen($number) == 9) {
        return $number;
    }
    return false;
}


function get_post_val($def, $key)
{

    if (@$_POST[$key] != "") {
        return @$_POST[$key];
    }
    return $def;
}


function timeBetween($start, $end = null)
{
    $end = (is_null($end)) ? time() : $end;
    $time = $end - $start;


    if ($time <= 60) {
        return 'اقل من  دقيقة ';
    }
    if (60 < $time && $time <= 3600) {
        $r = round($time / 60, 0);

        if ($r > 1 && $r < 11) {
            return $r . " دقائق";
        }


        return $r . ' دقيقة ';
    }
    if (3600 < $time && $time <= 86400) {
        $r = round($time / 3600, 0);

        if ($r <= 10 && $r > 1) {
            return $r . " ساعات ";
        } else if ($r < 1) {
            return "ساعة ";
        }
        return $r . " ساعة ";

        // return ($r > 1) ? $r.' '.'ساعات مضت' : 'ساعة مضت';
    }
    if (86400 < $time && $time <= 604800) {
        $r = round($time / 86400, 0);

        if ($r == 1) {
            return "يوم";
        } else if ($r == 2) {

            return "يومين";
        } else if ($r > 2 && $r < 11) {
            return $r . " ايام ";
        }
        return $r . " يوم";
    }
    if (604800 < $time && $time <= 2592000) {
        $r = round($time / 604800, 0);
        return ($r > 1) ? $r . ' ' . 'اسابيع مضت' : 'اسبوع مضى';
    }
    if (2592000 < $time && $time <= 29030400) {
        $r = round($time / 2592000, 0);

        return ($r > 1) ? $r . ' ' . 'شهور مضت' : 'شهر مضى';
    }
    if ($time > 29030400) {
        return date('M d y \a\t h:i A', $start);
    }
}


function get_support_filed_status($status)
{


    if ($status == 0) {
        return "غير مفعل";
    } else if ($status == 1) {

        return "مفعل";
    }
    return "غير محدد";
}

function getStatus($status)
{

    if ($status == 0) {
        return "<label class='badge badge-danger btn-rounded' >غير مفعل</label>";
    } else if ($status == 1) {

        return "<label class='badge badge-success btn-rounded' > مفعل</label>";
    } else if ($status == -1) {
        return "<label class='badge badge-danger btn-rounded' > محظور / مرفوض</label>";
    } else if ($status == "inactive") {
        return "<label class='badge badge-danger btn-rounded' >غير مفعل</label>";
    } else  if ($status == "rejected") {
        return "<label class='badge badge-danger btn-rounded' >مرفوض</label>";
    } else if ($status == "active") {

        return "<label class='badge badge-success btn-rounded' > مفعل</label>";
    } else if ($status == "approved") {

        return "<label class='badge badge-success btn-rounded' > مقبول</label>";
    } else if ($status == "pending") {
        return "<label class='badge badge-primary btn-rounded' > بإنتظار المراجعة</label>";
    } else if ($status == "banned") {
        return "<label class='badge badge-danger btn-rounded' > محظور / مرفوض</label>";
    } else if ($status == "uninterested") {
        return "<label class='badge badge-danger btn-rounded' > غير مهتم</label>";
    } else if ($status == "pasued") {
        return "<label class='badge badge-danger btn-rounded' > موقف قيد</label>";
    } else if ($status == "interested") {
        return "<label class='badge badge-success btn-rounded' >  مهتم</label>";
    } else if ($status == "done") {
        return "<label class='badge badge-success btn-rounded' >  تم الخدمة</label>";
    }

    return "<label class='badge badge-warning btn-rounded' >غير محدد</label>";
}
function printStatus($status)
{

    if ($status == "inactive") {
        echo "<label class='badge badge-danger btn-rounded' >غير مفعل</label>";
    } else  if ($status == "rejected") {
        echo "<label class='badge badge-danger btn-rounded' >مرفوض</label>";
    } else if ($status == "active") {

        echo "<label class='badge badge-success btn-rounded' > مفعل</label>";
    } else if ($status == "approved") {

        echo "<label class='badge badge-success btn-rounded' > مقبول</label>";
    } else if ($status == "pending") {
        echo "<label class='badge badge-primary btn-rounded' > بإنتظار المراجعة</label>";
    } else if ($status == "interested") {
        echo "<label class='badge badge-success btn-rounded' > مهتم</label>";
    } else if ($status == "banned") {
        echo "<label class='badge badge-danger btn-rounded' > محظور / مرفوض</label>";
    } else if ($status == "uninterested") {
        echo  "<label class='badge badge-danger btn-rounded' > غير مهتم</label>";
    } else if ($status == "paused") {
        echo  "<label class='badge badge-danger btn-rounded' > موقف قيد</label>";
    } else if ($status == "done") {
        echo  "<label class='badge badge-success btn-rounded' > تم الخدمة</label>";
    } else {

        echo "<label class='badge badge-warning btn-rounded' >غير محدد</label>";
    }
}

function print_message_status($status)
{

    if ($status == 0) {
        echo "<label class='badge badge-danger btn-rounded' >غير مقروء</label>";
    } else if ($status == 1) {

        echo "<label class='badge badge-success btn-rounded' > مقروء</label>";
    } else {

        echo "<label class='badge badge-warning btn-rounded' >غير محدد</label>";
    }
}

function get_ad_status_span($status)
{

    if ($status == 0) {
        echo "<label class='badge badge-warning' >غير مفعل</label>";
    } else if ($status == 1) {

        echo "<label class='badge badge-success' > مفعل</label>";
    } else if ($status == -1) {

        echo "<label class='badge badge-danger' > محظور </label>";
    } else {

        echo "<label class='badge badge-info' >غير محدد</label>";
    }
}


function check_id_number($id_number)
{
    $id = trim($id_number);
    if (!is_numeric($id)) return -1;
    if (strlen($id) !== 10) return -1;
    $type = substr($id, 0, 1);
    if ($type != 2 && $type != 1) return -1;
    $sum = 0;
    for ($i = 0; $i < 10; $i++) {
        if ($i % 2 == 0) {
            $ZFOdd = str_pad((substr($id, $i, 1) * 2), 2, "0", STR_PAD_LEFT);
            $sum += substr($ZFOdd, 0, 1) + substr($ZFOdd, 1, 1);
        } else {
            $sum += substr($id, $i, 1);
        }
    }
    return $sum % 10 ? -1 : $type;
}

function space_to_dash($txt)
{

    return str_replace(" ", "-", $txt);
}


function get_link_position($position)
{

    $array = array(1 => "قائمة الهيدر", 2 => "قائمة الفوتر 1", 3 => "قائمة الفوتر  2");

    return @$array[$position];
}

function get_link_target($position)
{

    $array = array("_blank" => "نافذة جديدة", "self" => "نفس النافذة");

    return @$array[$position];
}


function print_checkbox($name, $value, $label, $checked = false, $permissions = "")
{
    if ($checked or $permissions != "" and str_contains(strtoupper($permissions), strtoupper($value))) {

        $checked = 'checked="checked"';
    }
    echo '   <div class="form-check form-check-success">
                                <label class="form-check-label">
                                    <input type="checkbox" name="' . $name . '" value="' . $value . '" class="form-check-input" ' . $checked . '>
                                    ' . $label . '
                                    <i class="input-helper"></i></label>
                            </div>';
}


function getPermissions()
{

    $per['admins'] = "الإداريين";
    $per['pages'] = "الصفحات";
    $per['courses'] = "الدورات";
    $per['register'] = "المسجلين";
    $per['students'] = "الطلاب";
    $per['trainers'] = "المدربين";
    $per['marketers'] = "المسوقين";
    $per['quizzes'] = "الإختبارات";
    $per['interested'] = "بيانات المهتمين";
    $per['statistics'] = "الإحصائيات";
    $per['attenddance'] = "التحضير";
    $per['certificates'] = "الشهادات";
    $per['frontend'] = "بيانات الواجهة ";
    $per['settings'] = "الإعدادت العامة";


    return $per;
}
function extract_permissions($permissions)
{

    $per = get_per_arr();

    $output =  "";

    foreach ($per as $key => $item) {

        if (strpos(strtoupper($permissions), strtoupper($key))) {

            $output .= "<p class='box'>" . $item . "</p>";
        }
    }

    echo $output;
}



function fix_url($url)
{


    $url = str_replace("  ", "", $url);
    return str_replace(" ", "-", $url);
}


function mk_select($name, $array, $def_value = "", $array_keys = array(), $attrs = "class='form-control'", $def_label = "إختر", $def_label_value = -1)
{

    echo mk_select_var($name, $array, $def_value = "", $array_keys = array(), $attrs = "class='form-control'", $def_label = "إختر", $def_label_value = -1);
}
function mk_select_var($name, $array, $def_value = "", $array_keys = array(), $attrs = "class='form-control'", $def_label = "إختر", $def_label_value = -1)
{


    $output =  "<select name='" . $name . "' " . $attrs . " >  ";
    // echo $def_value;


    if ($def_label != "")

        $output .= "<option value='" . $def_label_value . "'>" . $def_label . "</option>";

    if (count($array_keys) == 0) {
        foreach ($array as $key => $val) {


            $slected = "";

            if ($key == $def_value) $slected = 'selected="selected"';
            // echo $slected . gettype($key);
            $output .= "<option value='" . $key . "' " . $slected . ">" . $val . "</option>";
        }
    } else {


        foreach ($array as $item) {


            $slected = "";

            if ($item[$array_keys[0]] == $def_value) $slected = 'selected="selected"';
            // echo $slected . gettype($key);
            $output .= "<option value='" . $item[$array_keys[0]] . "' " . $slected . ">" . $item[$array_keys[1]] . "</option>";
        }
    }


    $output .= "</select>";

    return $output;
}



function get_session($key)
{

    return Session::get($key);
}


function current_url($args = "")
{



    return url($args);
}




function get_types_array()
{

    return array("user", "store");
}
function pre($ar)
{
    echo "<pre>";
    print_r($ar);
    echo "</pre>";
}


function def_val($def, $val)
{

    return ($val != "") ? $val : $def;
}
function image_url($name)
{


    return url('storage/app/ads_images/' . $name);
}

function ads_images_url($image)
{

    return url("storage/app/ads_images/" . $image);
}

function category_image_url($image)
{

    return url("storage/app/categories_images/" . $image);
}

function is_logined($guard = "user")
{


    return (Auth::guard($guard)->check());
}



function country($key)
{

    $ar = Session::get('country');
    if (is_array($ar)) {

        return  @$ar[$key];
    }
    return  '';
}


function modernCheckBox($name, $val, $label, $id, $checked = false)
{

    $checked = ($checked or $checked == 1) ?  'checked="checked"' : "";

?>

    <div class="exp">
        <div class="checkbox">

            <div>
                <input type="checkbox" id="<?php echo $id ?>" name="<?php echo $name ?>" value="<?php echo $val  ?>" <?php echo $checked ?> />
                <label for="<?php echo $id ?>">
                    <?php echo $label ?>
                    <span>
                        <!-- This span is needed to create the "checkbox" element -->
                    </span>


                </label>
            </div>

        </div>
    </div>

<?php
}

function get_id_from_slung($id)
{


    return explode('-', $id)[0];
}



function toSlung($text)
{

    $text = str_replace("  ", " ", $text);
    $text = str_replace(" ", "-", $text);
    return  $text;
}


function print_price($price, $cc = "ر.س")
{

    echo  $price != 0 ? $price . '  ' . $cc : ' غير محدد';
}


function get_condition($index)
{

    // echo $index . " ds";

    $ar =  ["غير محدد", 'جديد ', "شبة جديد", "مستعمل"];

    return @$ar[$index] ? $ar[$index] : "غير محدد";
}



function loginRedirect()
{

    return  route('users.login') . "?redirect="   . \Request::getRequestUri();
    // return  route('users.login') . "?redirect="   . \URL::current();
}

function def_profile($profile)
{



    return $profile != "" ?  $profile :   asset('public/assets/images/user.png');
}
function def_cover($profile)
{



    return $profile != "" ?  $profile :   asset('public/assets/images/cover.png');
}

function validator_to_array($errors)
{

    $return = "";

    foreach ($errors as $error_array) {

        foreach ($error_array as $error) {
            $return .= $error . " \n ";
        }
    }

    return $return;

    // $return = array();

    // foreach ($errors as $error_array) {

    //     foreach ($error_array as $error) {
    //         $return[] = $error;
    //     }
    // }

    // return $return;



}

function mk_input($name, $label, $def_val, $type = "text")
{

    echo mk_input_var($name, $label, $def_val, $type);
}

function mk_input_var($name, $label, $def_val, $type = "text")
{

    $output = '
    <div class="form-group">
        <label for="' . $name . '">' . $label . '</label>
        <input type="' . $type . '" class="form-control" name="' . $name . '" value="' . $def_val . '" id="' . $name . '">
    </div>
    ';

    return $output;
}


function mk_textarea($name, $label, $def_val)
{

?>

    <div class="form-group">
        <label for="<?php echo $name ?>"><?php echo $label ?></label>
        <textarea class="form-control" name="<?php echo $name ?>" id="<?php echo $name ?>"><?php echo $def_val ?></textarea>
    </div>

<?php
}


function filterItem($label, $content,  $for, $col = 4)
{

?>


    <div class="form-group">
        <label for="<?php echo  $for ?>"><?php echo  $label ?></label>
        <?php echo $content ?>
    </div>


<?php
}

function inputItem($label, $content,  $for = "",  $required = false)
{

?>


    <div class="form-group mb-3 mt-3 ">
        <label for="<?php echo  $for ?>" class="mb-2"><?php echo  $label ?></label>
        <?php echo $content ?>
    </div>


<?php
}


function printRating($rating)
{


    // $rating = intval($rating);

    // echo $rating;
    if ($rating == 0) {
        return "لا توجد تقييمات بعد";
    }
    $html = "<div class='user-rating-div'>";
    while ($rating > 0) {


        // echo $rating . "<br>";

        if ($rating >= 1) {

            $html .= '<i class="mdi  mdi-star"></i>';
        } else  if ($rating >= 0.5 && $rating  < 1) {

            $html .= '<i class="mdi  mdi-star-half-full" style="transform:rotateY(180deg)"></i>';
        }
        $rating--;
    }
    $html .= "</div>";
    echo  $html;
}


function prefix_number($mobileNumber)
{

    return "966" .  $mobileNumber;
}
function sendSMS($mobileNumber, $messageContent)
{



    $mobileNumber = ($mobileNumber);


    if (1 == 10) {
        // testing 
        $return['status'] = true;
        $return['message'] = " تم الإرسال";

        return $return;
    }

    // taqnyat token : 0f95ed4047724ddeb1cd285a6e454322

    $token = "NDcipzYiqDNqxW3nYUGGaS8hHSryBVwo18k9umSh";
    $text = ($messageContent);

    $toArr = explode(",", $mobileNumber);


    
    // $to = "";

    // foreach ($toArr as  $value) {

    //     $to .= ($value) . ",";
    // }

    // auth call

    $ch = curl_init();
    // dd($mobileNumber);
    $post = ['number' => $mobileNumber, "message" => $messageContent, ];
    header('Content-Type: application/json'); // Specify the type of data
    $ch = curl_init('https://api.cartat.net/message/text'); // Initialise cURL
    $post = json_encode($post); // Encode the data array into a JSON string
    $authorization = "Authorization: Bearer " . $token; // Prepare the authorisation token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization)); // Inject the token into the header
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1); // Specify the request method as POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post); // Set the posted fields
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // This will follow any redirects
    $result = curl_exec($ch); // Execute the cURL statement
    curl_close($ch); // Close the cURL connection
    $result =  json_decode($result, true); // Return the received data




    if (($result['status']) == "success") {

        $return['status'] = true;
        $return['message'] = "تم الإرسال بنجاح ";
    } else {

        $return['status'] = false;
        $return['message'] = "حصلت مشكلة عند الإرسال ، يرجى إعادة المحاولة بوقت لاحق";
    }


    return $return;
}


function sendEmail($to, $subject, $view, $info)
{


    $emailObj = new \SendGrid\Mail\Mail();
    $emailObj->setFrom("no-reply@webdsht.com", get_option("site_name"));
    $emailObj->setSubject($subject);
    $emailObj->addTo($to, "");
    $emailObj->addContent(
        "text/html",
        view($view, $info)->render()
    );
    $sendgrid = new \SendGrid("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");
    $resposne =   $sendgrid->send($emailObj);

    if ($resposne->statusCode() == 202) {


        return ["status" => true, "message" => "تم ارسال البريد الالكتروني بنجاح"];
    } else {
        Mail::send(['html' => $view], $info, function ($message) use ($to, $subject) {
            $message->to($to, get_option('site_name'))
                ->subject($subject);
            $message->from('no-reply@webdsht.com', get_option("site_name"));
        });
    }


    return ["status" => true, "message" => "تم ارسال البريد الالكتروني بنجاح"];
}


function compressImage($image)
{
    if (file_exists($image)) {
        $im = new Imagick($image);

        $width = $im->getImageWidth();
        $height = $im->getImageHeight();

        $im->setImageCompression(true);
        $im->setImageCompression(Imagick::COMPRESSION_JPEG);
        $im->setImageCompressionQuality(40);
        $im->writeImage($image);
        $im->clear();
        $im->destroy();
    }
}


function adType($type)
{


    return "";
    $types = [
        1 => "عرض",
        2 => "طلب",
    ];

    return  $types[$type] ? $types[$type] : "";
}



function buttonIcon($label, $icon, $attrs = "")
{

?>

    <button class="flex items-center link-icon  table-option justify-between px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" <?= $attrs; ?>>
        <i class="fi <?= $icon ?> h-4"></i>

        <span><?php echo $label ?></span>
    </button>
<?php
}

function linkIcon($label, $icon, $href = "", $attrs = "", $byColor =  "purple", $extraClass = "")
{

?>

    <a href="<?= $href ?>" class="flex  link-icon   d-inline-block items-center table-option justify-between px-3 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-<?= $byColor ?>-600 border border-transparent rounded-lg active:bg-<?= $byColor ?>-600 hover:bg-<?= $byColor ?>-700 focus:outline-none focus:shadow-outline-purple <?= $extraClass ?> " <?= $attrs; ?>>
        <i class="fi <?= $icon ?>  h-4"></i>

        <?php if ($label != "") :  ?> <span><?php echo $label ?></span> <?php endif; ?>
    </a>
<?php
}


function houseTypesArray()
{

    return [

        "شقة" => "شقة",
        "فيلا" => "فيلا",
        "دور" => "دور",
        "بيت شعبي" => "بيت شعبي",

    ];
}

function isRentArray()
{

    return [

        0 => "ملك",
        1 => "إجار",


    ];
}

function salariesAr()
{

    return [

        "2000 ريال فأقل" => "2000 ريال فأقل",
        "2000 - 4000 ريال" => " 2000 - 4000 ريال",
        "4000 ريال فأكثر" =>   "4000 ريال فأكثر",


    ];
}






function livingWithAr()
{

    return [

        "الوالدين" => "الوالدين",
        "الأب فقط" => "الأب فقط",
        "الأم فقط" => "الأم فقط",
        "غير ذلك" => "غير ذلك",

    ];
}

function yesNoAr()
{

    return [

        1 => "نعم",
        0 => "لا",


    ];
}


function quaAr()
{

    return [

        "أمي" => "أمي",
        "يقرأ ويكتب " => "يقرأ ويكتب ",
        "ابتدائي" => "ابتدائي",
        "متوسط" => "متوسط",
        "ثانوي" => "ثانوي",
        "جامعي" => "جامعي",
        "دراسات عليا ماجستير " => "دراسات عليا ماجستير ",
        "دكتوراه" => "دكتوراه",
    ];
}

function fatherJobAr()
{

    return [

        "طبيب" => "طبيب",
        "مهندس" => "مهندس",
        "فني" => "فني",
        "معلم" => "معلم",
        "اكاديمي" => "اكاديمي",
        "عسكري" => "عسكري",
        "-1" => "غير ذلك "
    ];
}

function motherJobAr()
{

    return [
        "طبيبة" => "طبيبة",
        "مهندسة" => "مهندسة",
        "معلمة" => "معلمة",
        "اكاديمية" => "اكاديمية",
        "ربة منزل" => "ربة منزل",
        "-1" => "غير ذلك "
    ];
}

function devRand()
{

    return "?version=" . rand(1, 1000000);
}

function cleanString($string)
{
    $string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
    $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.

    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}


function gradeKey($grade)
{

    switch (intval($grade)) {

        case ($grade >= 90):
            return "A";
        case ($grade >= 80):
            return "B";
        case ($grade >= 70):
            return "C";
        case ($grade >= 60):
            return "D";

        case ($grade >= 50):
            return "E";
        default:
            return "F";
    }
}


function getPercentage($n, $total)
{

    $percentage = (($n / $total) * 100);
    return round($percentage  * 100, 2);
}


function toDash($text)
{

    $text =  str_replace("  ", " ", $text);
    return str_replace(" ", "-", $text);
}


function getLevelID($string)
{

    if (str_contains($string, "ابتدائي")) {

        return 1;
    }

    if (str_contains($string, "متوسط")) {

        return 2;
    }

    if (str_contains($string, "ثانوي")) {

        return 3;
    }

    return 1;
}

function getClassName($string)
{

    $string =  str_replace("الابتدائي", "", $string);
    $string =  str_replace("المتوسط", "", $string);
    return str_replace("الثانوي", "", $string);
}


function courseTypes($key = null)
{

    $types = ["qualifying" => "تأهيلية", "training" => "تدريبية", "english" => "لغة انجليزية"];

    if (@!$types[$key] && $key != null) {

        return "غير محدد";
    } else  if ($key) {

        return @$types[$key];
    }

    return $types;
}
function interestedStatus($key = null)
{

    $types = ["done" => "تم الخدمة", "pending" => "بإنتظار المراجعة", "rejected" => "مرفوض", "uninterested" => "غير مهتم", "interested" => "مهتم"];

    if (@!$types[$key] && $key != null) {

        return "غير محدد";
    } else  if ($key) {

        return @$types[$key];
    }

    return $types;
}
function marketerStatus($key = null)
{

    $types = ["active" => "نشط", "pending" => "بإنتظار المراجعة", "banned" => "محظور", "inactive" => "غير مفعل"];

    if (@!$types[$key] && $key != null) {

        return "غير محدد";
    } else  if ($key) {

        return @$types[$key];
    }

    return $types;
}


function usersTypes($key = null)
{

    $types = ['user' => 'مستخدم عادي', 'employer' => 'صاحب عمل', "company" => 'شركة او مؤسسة', "government" => "حكومي او منظمات"];

    if ($key) {

        return $types[$key];
    }

    return $types;
}



function harajTypes($key = null)
{

    $types = ['used' => 'مستخدم', 'new' => 'جديد',];

    if ($key) {

        return $types[$key];
    }

    return $types;
}


function categoriesTypes($key = null)
{

    $types = [
        'import' => 'اقسام شركات الاستيراد',
        'consulting' => 'اقسام شركات الاستشارات الهندسية',
        "company" => 'اقسام الشركات',
        "freelancer" => "اقسام الاعمال الحرة",
        "home_service" => "اقسام الاعمال المنزلية",
        "pprofile" => " اقسام الملفات المهنية",
        "product" => "اقسام منتجات و عروض",
        "rental" => "اقسام تأجير السيارات والمعدات",
        "technician" => "اقسام الفنيين",
        "tender" => "اقسام المناقصات",
        "import" => "اقسام شركات الاستيراد",
        "profile_job" => "اقسام الملفات المهنية الفرعية",
        "course" => "اقسام الدورات و الندوات",
        "jobs" => "اقسام الوظائف",
        "haraj" => "اقسام الحراج",
        "construction" => "اقسام مقاولات الباطن و طلبات عروض الاسعار",
    ];

    if ($key) {

        return $types[$key] ?? $key;
    }

    return $types;
}
function hallsTypes($key = null)
{

    $types = ['practical' => 'عملي', 'theory' => 'نظري',];

    if ($key) {

        return $types[$key];
    }

    return $types;
}
function studyPeriods($key = null)
{

    $types = ['morning' => 'صباحي', 'evening' => 'مسائي', "both" => "صباحي او مسائي"];

    if ($key) {

        return $types[$key];
    }

    return $types;
}


function currenciesArr($key = null)
{

    $types = ["د.أ" => "$",  "ر.س" =>  "ر.س",  "ر.ي" =>  "ر.ي"];

    if ($key) {

        return $types[$key];
    }

    return $types;
}
function paymentTypes($key = null)
{

    $types = ['bank' => 'تحويل بنكي', 'moyasar' => 'دفع الكتروني', "tabby" => "تابي"];

    if ($key) {

        return $types[$key];
    }

    return $types;
}



function getSlungID($slung)
{

    $slung = explode("-", $slung);
    // return $slung[count($slung) - 1];
    return $slung[0];
}



function seriveItem($title, $image, $linkText = "عرض",  $link = null)
{

?>
    <div class="card py-5 border-0 shadow-sm serivce-title-card">
        <div class="card-body">
            <div class="row">


                <img src="<?= asset('public/assets/frontend/img/services/' . $image) ?>" alt="" class="img-fluid" style="">

                <h3><?= $title ?></h3>

                <!-- <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p> -->
                <!-- <a href="<?= $link ?>" class="btn btn-primary rounded" style="    width: auto;
    margin: 0px auto;"><?= $linkText ?></a> -->
            </div>
        </div>
    </div>
<?php
}


function defImg($type = "")
{



    return asset('public/assets/frontend/img/icons/logo.png');
}


function homeItem($title, $image)
{

?>
    <div class="card py-5 border-0 shadow-sm home-title-card">
        <div class="card-body">
            <div class="row">


                <img src="<?= asset('public/assets/frontend/img/services/' .  $image) ?>" alt="" class="img-fluid" style="">

                <h3><?= $title ?></h3>

            </div>
        </div>
    </div>
<?php
}



function tenderItem($title,  $category,   $companyName, $publish_date, $last_date,  $city, $fees, $price, $image)
{

?>

<?php
}






function filterLink($title, $class = "", $catID = "")
{

?>

    <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2  filter-category-button      quick-filter-button <?= $class ?>" data-category-id="<?= $catID ?>"><?= $title ?></a>
<?php
}



function filterCityLink($title, $class = "", $cityID = "")
{

?>

    <a href="#" class="btn btn-outline-primary btn-sm me-2 mb-2  filter-city-button      quick-filter-button <?= $class ?>" data-city-id="<?= $cityID ?>"><?= $title ?></a>
<?php
}



function keyToLink($item)
{
    $icon  = "";
    if ($item->content == "") return "";
    switch ($item->key) {

        case "instagram":
            $icon = "fi fi-brands-instagram";
            break;
        case "twitter":
            $icon = "fi fi-brands-twitter";
            break;

        case "facebook":
            $icon = "fi fi-brands-facebook";
            break;
        case "website":

            $icon = "fi fi-rr-earth-americas";
            break;

        default:
            $icon = "";
            break;
    }


    if ($icon != "") {

        return '<a href="' . $item->content . '" class="social-icon ' . $item->key . '"><i class="' . $icon . '"></i></a>';
    }
}

function daysLeft($targetDate)
{


    // return $targetDate;

    // Convert the target date to a Carbon instance
    $targetCarbon = \Carbon\Carbon::parse($targetDate);

    // Get the current date as a Carbon instance
    $currentCarbon = \Carbon\Carbon::now();

    // Calculate the remaining days
    return  $currentCarbon->diffInDays($targetCarbon);
}
