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
            
            assert title == "Thailand Software Engineering Academy - Login"
            
            doLogin("admin", "seath66")
            waitFor { at HomePage }
            
            to AdminVideoPage
            
            assert title == "Thailand Software Engineering Academy - Video Manager"
            
        }
}

