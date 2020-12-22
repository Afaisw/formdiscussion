<?php
function validateWajib(&$errors, $field_list, $field_name)
	{
		if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
			$errors[$field_name] = 'field is required';
		}
	}
function validateAlfabet(&$errors, $field_list, $field_name)
	{
		$pattern = "/^[a-z A-Z'-]+$/"; // format surname (alfabet)
		if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
			$errors[$field_name] = 'field is required';
		}
		else if (!preg_match($pattern, $field_list[$field_name])){
			$errors[$field_name] = 'Must Contain Alphabets only';
		}
	}

function validateEmail(&$errors, $field_list, $field_name)
	{
		if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
			$errors[$field_name] = 'field is required';
		}
		else if (!filter_var($field_list[$field_name], FILTER_VALIDATE_EMAIL)) {
			$errors[$field_name] = 'Invalid Email Address';
		}
	}
function validateNumerik(&$errors, $field_list, $field_name)
	{
		$patternnum = "/^\d[0-9]+$/";
		$num_length = strlen((string)$field_list[$field_name]);
		if (!isset($field_list[$field_name]) || empty($field_list[$field_name])){
			$errors[$field_name] = 'field is required';
		}
		else if ($num_length < 10) {
			$errors[$field_name] = 'Mobile Number is less than 10 digits long';
		}
		else if (!preg_match($patternnum, $field_list[$field_name])) {
			$errors[$field_name] = 'Must Contain Numerics only';
		}
	}
function validateAlfanumerik(&$errors, $field_list, $field_name)
	{
		$pattern = "/.{8,}/";
		$pattern1 = "/(?=.*[a-zA-Z])(?=.*[0-9])/";
		if (!isset($field_list[$field_name]) || empty($field_list[$field_name]))
			$errors[$field_name] = 'field is required';
		
		else if(!preg_match($pattern, $field_list[$field_name]))
			$errors[$field_name] = 'password is less than 8 characters long';
		
		else if(!preg_match($pattern1, $field_list[$field_name]))
			$errors[$field_name] = 'must contain alphabets & numerics';
	}
function validateConfirm(&$errors, $field_list, $field_name1, $field_name2)
	{
		if (!isset($field_list[$field_name2]) || empty($field_list[$field_name2])){
			$errors[$field_name2] = 'field is required';
		}
		else if ($field_list[$field_name1] != $field_list[$field_name2]) {
			$errors[$field_name2] = 'Passwords do not match';
		}
	}
?>