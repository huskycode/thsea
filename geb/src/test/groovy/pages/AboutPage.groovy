/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
import geb.*
/**
 *
 * @author Rux
 */
class AboutPage extends Page  {
    static url = System.properties['geb.build.baseUrl'] + "page?view=about" 
    static at = {title=="Thailand Software Engineering Academy - About"}
}

