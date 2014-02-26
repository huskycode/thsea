/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

import geb.*

/**
 *
 * @author Rux
 */
class VideoListPage extends Page  {
    static url = System.properties['geb.build.baseUrl']
    static at = { title == "Thailand Software Engineering Academy" }
    static content = {
        sponsorSection { $("div.columns.lp-header h6") }
        recordDateItems{ $("div[title='Recording Date'] span")}
		videoSection { $("div[data-video]").size() }
		mostRecentSectionLeftSide { $("div.video-most-recent-leftside") }
		mostRecentSectionRightSide { $("div",class:"nine columns column-last") }
		popularSection { $("div",id:"home-popular") }

    }
}

