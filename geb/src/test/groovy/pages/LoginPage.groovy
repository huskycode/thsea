/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

import geb.*

/**
 *
 * @author Rux
 */
class LoginPage extends Page  {
    static url = "http://ruxcom.com/thsea/login"
    
    static at = { title == "Thailand Software Engineering Academy - Login" }
    
    static content = {
        loginForm{ $("#login-form") }
        
        userNameTextField{loginForm.find("input[id=LoginForm_username]")}
        passwordTextField{loginForm.find("input[id=LoginForm_password]")}
        submitButton{loginForm.find(type: "submit")}
        
        
    }
    
    void login(userName, password){
        userNameTextField.value(userName)
        passwordTextField.value(password)
        submitButton.click()
    }
}

