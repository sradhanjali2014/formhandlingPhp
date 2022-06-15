<?php
$name='';
$city='';
$educationStr='';
$gender='';
$femaleChecked='';
$maleChecked='';
$education=array();
if(isset($_POST['name'])){
	$name=$_POST['name'];
	$password=$_POST['password'];
	$city=$_POST['city'];
	if(isset($_POST['gender'])){
		$gender=$_POST['gender'];
		if($gender=='Male'){
			$maleChecked="checked='checked'";
		}if($gender=='Female'){
			$femaleChecked="checked='checked'";
		}
	}
	if(isset($_POST['education'])){
		$education=$_POST['education'];
		$educationStr=implode(", ",$education);
	}
	
	echo "Name:- $name<br/>";
	echo "Password:- $password<br/>";
	echo "City:- $city<br/>";
	echo "Gender:- $gender<br/>";
	echo "Education:- $educationStr<br/>";
	echo "<br/>";
}
?>
<form method="post">
	Name:- <input type="textbox" name="name" value="<?php echo $name?>"/><br/><br/>
	Password:- <input type="password" name="password"/><br/><br/>
	Gender:- 
	Female <input type="radio" name="gender" value="Female" <?php echo $femaleChecked?>/>
	Male <input type="radio" name="gender" value="Male" <?php echo $maleChecked?>/><br/><br/>
	City:- 
	<?php
	$cityArr=array('Delhi','Noida','Mumbai','Pune','Bareilly');
	?>
	<select name="city">
		<option>Select City</option>
		<?php 
		foreach($cityArr as $list){
			$isSelected="";
			if($city==$list){
				$isSelected="selected";
			}
			echo "<option $isSelected>".$list."</option>";
		} 
		?>
	</select>
	<br/><br/>
	Education:-
	<?php
	$educationArr=array('B.Tech','M.Tech','B.Sc');
	foreach($educationArr as $list){
		if(in_array($list,$education)){
			echo "$list <input type='checkbox' name='education[]' value='$list' checked='checked'>";
		}else{
			echo "$list <input type='checkbox' name='education[]' value='$list'>";
		}
	}
	
	?>
	<br/><br/><input type="submit"/>	
</form>