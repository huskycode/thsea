import geb.*
import geb.junit4.*
import org.junit.Test

import org.junit.runner.RunWith
import org.junit.runners.JUnit4

class SEacademyTest extends GebReportingTest {

    @Test
    void theTitleLinkShouldBeThSEA() {
        to SEacademyPage
        
	    assert title == "Thailand Software Engineering Academy"	
    }
    
}
