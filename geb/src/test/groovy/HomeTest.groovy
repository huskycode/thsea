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
    
    @Test
    void videoListSortByRecordDateAscending(){
        to HomePage
        
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
        to HomePage
        // click the link 
        $("a.fb-comment-count", 0).click();
        def videoHref = $("a.fb-comment-count", 0).@href;
        def windowLocation = js."window.location.href";
        assert windowLocation == videoHref;
    }
    
}
