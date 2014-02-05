import geb.*
import geb.junit4.*
import org.junit.Test

import org.junit.runner.RunWith
import org.junit.runners.JUnit4

@RunWith(JUnit4)
class VideoListTest extends GebReportingTest {
    
    @Test
    void theTitleLinkShouldBeThSEA() {
        to VideoListPage
    }
    
    @Test
    void sponsorTextShouldBeContentSponsor(){
        to VideoListPage   
        assert sponsorSection.text() == "Content Sponsor"
    }
    
    /*
    @Test
    void locationChangeWithHashTag(){
        to HomePage
        // click the link 
        $("a.fb-comment-count", 0).click();
        def videoHref = $("a.fb-comment-count", 0).@href;
        def windowLocation = js."window.location.href";
        assert windowLocation == videoHref;
    }
    */
	
	@Test
	void  videoListShouldDisplayMostRecentSection() {
        to VideoListPage   	
		
		//main most recent video section
		assert $("div",class:"seven columns").size() == 1;
		assert $("div",class:"video-thumbnail-large").size() == 1;
		//right side most recent video section
		assert $("div",class:"nine columns column-last").size() == 1;

	}
	
	/*
	@Test
	void  mostRecentVideoShouldDisplayAtMostRecentSection() {
	    to VideoListPage   	
		// Most Recent -> Recording Date
	
	}
	*/

	@Test	
	void  tagInfoShouldFoundOnEachVideoClip() {
	    to VideoListPage   	

		assert $("span",class:"tags").size() == $("div", class:"video-block").size();
                    
	}	

	@Test	
	void  viewCounterShouldFoundOnEachVideoClip() {
	    to VideoListPage   	

		assert $("span",class:"view-counter").size() == $("div", class:"video-block").size();
                    
	}	
    
    
}
