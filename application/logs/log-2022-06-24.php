<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-06-24 16:18:51 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\amol4\application\controllers\Auth.php 90
ERROR - 2022-06-24 18:45:37 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\amol4\application\controllers\Auth.php 90
ERROR - 2022-06-24 18:47:01 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\amol4\application\controllers\Auth.php 90
ERROR - 2022-06-24 18:49:41 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\amol4\application\views\user\user\requestedit.php 138
ERROR - 2022-06-24 18:50:58 --> Severity: Notice --> Undefined variable: id C:\xampp\htdocs\amol4\application\views\user\user\requestedit.php 138
ERROR - 2022-06-24 19:25:00 --> Severity: error --> Exception: syntax error, unexpected end of file C:\xampp\htdocs\amol4\application\views\user\report\report.php 293
ERROR - 2022-06-24 19:33:18 --> Query error: Unknown column 'name' in 'order clause' - Invalid query: SELECT *
FROM `wallet_log`
ORDER BY `name` ASC
 LIMIT 10
ERROR - 2022-06-24 19:43:26 --> Query error: Column 'status' in order clause is ambiguous - Invalid query: SELECT `users`.`username`, `expences_type`.`name` as `type`, `expences`.`amount`, `expences`.`wallet_type`, `expences`.`user_id`, `expences`.`file`, `expences`.`id`, `expences`.`rejectnote`, `expences`.`edate`, `expences`.`staus`
FROM `expences`
LEFT JOIN `users` ON `expences`.`user_id`=`users`.`id`
LEFT JOIN `expences_type` ON `expences`.`type`=`expences_type`.`id`
ORDER BY `status` ASC
 LIMIT 10
ERROR - 2022-06-24 19:43:31 --> Query error: Column 'status' in order clause is ambiguous - Invalid query: SELECT `users`.`username`, `expences_type`.`name` as `type`, `expences`.`amount`, `expences`.`wallet_type`, `expences`.`user_id`, `expences`.`file`, `expences`.`id`, `expences`.`rejectnote`, `expences`.`edate`, `expences`.`staus`
FROM `expences`
LEFT JOIN `users` ON `expences`.`user_id`=`users`.`id`
LEFT JOIN `expences_type` ON `expences`.`type`=`expences_type`.`id`
ORDER BY `status` ASC
 LIMIT 10
ERROR - 2022-06-24 19:45:01 --> Severity: Notice --> Undefined index: name C:\xampp\htdocs\amol4\application\controllers\Auth.php 90
