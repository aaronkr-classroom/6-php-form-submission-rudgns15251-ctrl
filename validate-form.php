<?php
// validate-form.php
declare(strict_type = 1);
require 'includes/validate.php';

$user = [
  'name'   => '',
  'age'    => '',
  'terms'  => ''
];                      // $user 배열 초기화ㅣ
      
$errors = [
  'name'  => '',
  'age'   => '',
  'terms' => ''
];                       // $ERRORs 배열 초기화ㅣ
$message = '';           // $message 초기화

if($_SERVER['REQUEST_METHOD']== 'POST') {  //폼 제출 확인
 $user['name'] = $_POST['name'];           //이름 저장
 $user['age'] = $_POST['age'];             //나이저장
 $user['terms'] = (isset($_POST['terms'])   //동의서 확인
                  and $_POST['terms'] == true) ? true : false;

 $errors['name']= is_text($user['name'],2,20)? '' :
                          '2~20문자로 이름 생성';
 $errors['age']= is_number($user['age'],16,65)?'':
                          '16~65살 사이 입력';
 $errors['terms']= $user['turms']?'':
                          '동의해야합니다.';     
                          
$invalid = implode($errors);
if($invalid){
  $message = '오류 해결하세요';
} else {
  $message = '폼 잘 제출 감사'
}        
}



?>
<?php include 'includes/header.php'; ?>

<?= $message ?>
<form action="validate-form.php" method="POST">
  Name: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>">
  <span class="error"><?= $errors['name'] ?></span><br>
  Age:  <input type="text" name="age" value="<?= htmlspecialchars($user['age']) ?>">
  <span class="error"><?= $errors['age'] ?></span><br>
  <input type="checkbox" name="terms" value="true" <?= $user['terms'] ? 'checked' : '' ?>>
  I agree to the terms and conditions
  <span class="error"><?= $errors['terms'] ?></span><br>
  <input type="submit" value="Save">
</form>

<?php include 'includes/footer.php'; ?>