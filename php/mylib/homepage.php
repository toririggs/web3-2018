<?php

require_once "regularpage.php";

class Home extends Gen { 
 function doctype() {
  echo "<!DOCTYPE html>\n";
  $this->html();
 }
 function html() {
  echo "<html>\n";
  $this->head();
  $this->body();
  echo "</html>";
 }
 function head() {
  echo "<head>\n";
  $this->title();
  $this->css();
  $this->js();
  echo "</head>\n";
 }
 function title() {
  echo "<title> Home </title>\n";
 }
 function css() {
  echo "<link rel='stylesheet' href= 'styles.css'>\n";
 }
 function js() {
  echo "<script src='script.js'></script>\n";
 }
 function body() {
  echo "<body> Home page body. <a href = 'second.php'> page2</a> <a href = 'third.php'> Hello world</a> </body>\n";
  }
 function generate() {
  $this->doctype();
  }
}
?>
