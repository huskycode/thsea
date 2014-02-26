/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

import geb.*

/**
 *
 * @author Rux
 */
class AdminVideoPage extends Page  {
    static url = System.properties['geb.build.baseUrl'] + "admin/video"
    static at = {title=="Thailand Software Engineering Academy - Video Manager"}
}

