import geb.*
import geb.junit4.*
import org.junit.Test

import org.junit.runner.RunWith
import org.junit.runners.JUnit4

@RunWith(JUnit4)
class HomeTest extends GebReportingTest {

    @Test
    void theTitleLinkShouldBeThSEA() {
        to HomePage
        
	assert title == "Thailand Software Engineering Academy"	
    }
    
    @Test
    void sponsorTextShouldBeContentSponsor(){
        to HomePage
        at HomePage
        
        assert sponsorText == "Content Sponsor"
    }
}
