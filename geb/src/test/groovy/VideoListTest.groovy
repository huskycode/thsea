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
		assert $("div",class:"video-most-recent-leftside").size() == 1;
		//right side most recent video section
		assert $("div",class:"nine columns column-last").size() == 1;

	}

	@Test
	void  videoListShouldDisplayPopularSection() {
        to VideoListPage   	
		
		assert $("div",id:"home-popular").size() == 1;

	}
	
	/*
	@Test
	void  mostRecentVideoShouldDisplayAtMostRecentSection() {
	    to VideoListPage   	
		// Most Recent -> Recording Date
	
	}
	*/

	@Test	
	void  tagInfoShouldFoundOnEachVideoClipAtMostRecentSection() {
	    to VideoListPage   	

	    def totalTagInfoOnLeftSide = mostRecentSectionLeftSide.find("span.tags").size();
	    def totalVideoClipOnLeftSide = mostRecentSectionLeftSide.find("div.video-block").size();
	    def totalTagInfoOnRightSide = mostRecentSectionRightSide.find("span.tags").size();
	    def totalVideoClipOnRightSide = mostRecentSectionRightSide.find("div.video-block").size();

	    assert totalTagInfoOnLeftSide == totalVideoClipOnLeftSide;
	    assert totalTagInfoOnRightSide == totalVideoClipOnRightSide;
                     
	}	

	@Test	
	void  tagInfoShouldFoundOnEachVideoClipAtPoppularSection() {
	    to VideoListPage   	

	    def totalTagInfo = popularSection.find("span.tags").size();
	    def totalVideoClip = popularSection.find("div.video-block").size();

	    assert totalTagInfo == totalVideoClip;

	}	

	@Test	
	void  viewCounterShouldFoundOnEachVideoClip() {
	    to VideoListPage   	

		assert $("span",class:"view-counter").size() == $("div", class:"video-block").size();
                    
	}	
    
    
}
