<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Auth//
$route['login']['get']='Auth/index'; //view page login
$route['login']['post']='Auth/login'; //login logic 
$route['logout']='Auth/logout';//logout 


$route['forget']='Auth/forget';//forget password view 
$route['forget-process']='Auth/forget_process';

//2fa
$route['two-fa']='Auth/twofa';
$route['verify-fa']='Auth/verifyfa';
$route['resend-fa']='Auth/resendfa';
//Auth-Registraction
$route['register']='Auth/register'; //view page
$route['join']['post']='Auth/register'; //logic
$route['email-verify/(:any)']['get']='Auth/verify_view/$1';
$route['resend-email/(:any)']['get']='Auth/resendotp/$1';
$route['email-verify']['post']='Auth/verify_view';
//user
$route['dashboard']='user/Dashboard';
$route['profile']='user/Profile';
$route['profile-update']='user/Profile/profile_update';
$route['profile-password-update']='user/Profile/password';



//user
$route['add-ex']='user/user/add';  //for manager , and user and  fin manager only
$route['addex']='user/user/addex'; //for manager , and user and  fin manager only
$route['getexpencesjson']='user/user/getexpencesjson'; //for manager , and user and  fin manager only
$route['getexpencesjson1']='user/user/getexpencesjson1'; //for manager , and user and  fin manager only




$route['action-on-ex']='user/user/actinonex'; //for  fin manager only
$route['request-approve/(:any)']='user/user/requestapprove/$1'; //for  fin manager only
$route['request-reject/(:any)/(:any)']='user/user/requestreject/$1/$2'; //for  fin manager only
$route['edit-reject']='user/user/editreqsave'; //for manager , and user and  fin manager only

$route['report']='user/user/report';  //for finmanager and manager only


$route['addprepaid']='user/user/addprepaid';
$route['getwalletlogjson']='user/user/getwalletlogjson';

//Admin
$route['expences-category']='user/Dashboard/expences_category';
$route['expences-category-add']='user/Dashboard/expences_category_add';
$route['expences-category-edit']='user/Dashboard/expences_category_edit';

$route['expences-type']='user/Dashboard/expences_type';
$route['expences-type-add']='user/Dashboard/expences_type_add';
$route['expences-type-edit']='user/Dashboard/expences_type_edit';

$route['manage-role']='user/Dashboard/role';
$route['user-type-add']='user/Dashboard/role_add';
$route['user-type-edit']='user/Dashboard/role_edit';

$route['add-emp']='user/Dashboard/addemp';
$route['save-emp']='user/Dashboard/saveemp';
$route['edit-emp/(:any)']='user/Dashboard/editemp/$1';
$route['status-emp/(:any)']='user/Dashboard/statusemp/$1';
$route['delete-emp/(:any)']='user/Dashboard/delemp/$1';


$route['update-emp']='user/Dashboard/updateemp';
$route['usersjson']='user/Dashboard/usersjson';
$route['manage-emp']='user/Dashboard/listemp';

$route['setting']='user/Dashboard/setting';
$route['setting-logo']='user/Dashboard/settinglogo';