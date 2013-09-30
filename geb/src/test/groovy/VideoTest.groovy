import geb.*
import geb.junit4.*
import org.junit.Test
import org.junit.runner.RunWith
import org.junit.runners.JUnit4
import java.util.Calendar.*
import java.text.SimpleDateFormat

class VideoTest extends GebReportingTest {
    
    @Test
    void locationChangeWithHashTag(){
        Browser.drive {
            to VideoPage
            // make sure we actually got to the page
            assert title == "Thailand Software Engineering Academy - Video"

            // is the first link to wikipedia?
            def videoLink = $("span.fb_comments_count", 0)
            // click the link 
            videoLink.click()
            // wait for Google's javascript to redirect to Wikipedia
            assert getCurrentWindow() != "http://uat.seacademy.in.th/video"
        }
    }
    
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
}
