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
        def videoHref = $("a.fb-comment-count", 0).@href;
        def windowLocation = js."window.location.href";
        assert windowLocation == videoHref;
    }
}
