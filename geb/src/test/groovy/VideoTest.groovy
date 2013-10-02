import geb.*
import geb.junit4.*
import org.junit.Test
import org.junit.runner.RunWith
import org.junit.runners.JUnit4
import java.util.Calendar.*
import java.text.SimpleDateFormat

@RunWith(JUnit4)
class VideoTest extends GebReportingTest {
    
    @Test
    void videoListSortByRecordDateAscending(){
        to VideoPage
        
        assert recordDateItems.size()==7
        
        int count = 0;
        def dateFormat = new java.text.SimpleDateFormat("MMMM dd, yyyy", Locale.US)
        def previousDate = dateFormat.parse("January 01, 1900")
        
        
        recordDateItems.each{
            Date currentDate
            
            if (it.text() != "-"){
                currentDate = dateFormat.parse(it.text())
                
                assert currentDate>=previousDate
                
                previousDate = currentDate
            }
            count++;
        }
    }
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
    
    @Test
    void simpleTest(){
        to VideoPage
    }
    
    @Test
    void simpleTest(){
        to HomePage
    }
}
