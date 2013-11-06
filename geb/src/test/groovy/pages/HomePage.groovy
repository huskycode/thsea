/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

import geb.*

/**
 *
 * @author Rux
 */
class HomePage extends Page  {
    static url = "http://uat.seacademy.in.th/"
    static at = { title == "Thailand Software Engineering Academy" }
    static content = {
        sponsorSection { $("div.columns.lp-header h6") }
        recordDateItems{ $("div[title='Recording Date'] span")}
    }
}

