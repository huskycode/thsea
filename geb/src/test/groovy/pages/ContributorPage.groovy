/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
import geb.*
/**
 *
 * @author Rux
 */
class ContributorPage extends Page  {
    static url = System.properties['geb.build.baseUrl'] + "page?view=contributor"
    static at = {title=="Thailand Software Engineering Academy - Contributor"}
}

