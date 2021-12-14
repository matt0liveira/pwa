<?php
if(verifyLogin()){
    retornar(1, null);
} else{
    retornar(0, null);
}