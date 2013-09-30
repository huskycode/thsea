import geb.*
import geb.junit4.*
import org.junit.Test

import org.junit.runner.RunWith
import org.junit.runners.JUnit4
@RunWith(JUnit4)
class VideoTest extends GebReportingTest {
    @Test
    void locationChangeWithHashTag(){
        to VideoPage
        // make sure we actually got to the page
        assert title == "Thailand Software Engineering Academy - Video"
        // click the link 
        $("a.fb-comment-count", 0).click();
        // wait for Google's javascript to redirect to Wikipedia
        assert browser.driver.executeScript("return window.location.href;") == $("a.fb-comment-count", 0).@href;
    }
}
