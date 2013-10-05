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
    }
    
    @Test
    void sponsorTextShouldBeContentSponsor(){
        to HomePage
        
        assert sponsorSection.text() == "Content Sponsor"
    }
}
