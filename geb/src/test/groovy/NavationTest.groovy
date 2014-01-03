import geb.*
import geb.junit4.*
import org.junit.Test
import org.junit.runner.RunWith
import org.junit.runners.JUnit4

@RunWith(JUnit4)
class NavationTest extends GebReportingTest  {
	
    @Test
    void navigateToAboutPageSuccess(){
        
        to AboutPage        
    }
}

