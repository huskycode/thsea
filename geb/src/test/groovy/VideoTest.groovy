import geb.*
import geb.junit4.*
import org.junit.Test

import org.junit.runner.RunWith
import org.junit.runners.JUnit4

class VideoTest extends GebReportingTest {

    @Test
    void theTitleLinkShouldBeThSEA() {
        to SEacademyPage
        
	    assert title == "Thailand Software Engineering Academy"	
    }
    
    @Test
    void locationChangeWithHashTag(){
        Browser.drive {
            go "http://uat.seacademy.in.th/video"

            // make sure we actually got to the page
            assert title == "Thailand Software Engineering Academy - Video"


            // is the first link to wikipedia?
            def videoLink = $("span.fb_comments_count", 0)
            // click the link 
            videoLink.click()
            // wait for Google's javascript to redirect to Wikipedia
            waitFor { title == "Wikipedia" }
        }
    }
}
