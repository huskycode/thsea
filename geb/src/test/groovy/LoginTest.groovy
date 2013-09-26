import geb.*
import geb.junit4.*
import org.junit.Test

import org.junit.runner.RunWith
import org.junit.runners.JUnit4
@RunWith(JUnit4)
class LoginTest extends GebReportingTest  {
    @Test
    void loginToAdminPageSuccess(){
        to LoginPage
        at LoginPage

        doLogin("admin", "seath66")
        at HomePage

        to AdminVideoPage
        at AdminVideoPage
    }
        
    @Test
    void loginToAdminPageFailure(){
        to LoginPage
        at LoginPage
        
        doLogin("admin", "xxxxx")        
        at LoginPage 
    }
}

