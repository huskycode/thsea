import geb.*
import geb.junit4.*
import org.junit.Test
import org.junit.runner.RunWith
import org.junit.runners.JUnit4

@RunWith(JUnit4)
class LoadStaticPageTest extends GebReportingTest  {
    @Test
    void loadAboutPageSuccess(){
        to AboutPage
    }
        
    @Test
    void loadContributorPageSuccess(){
        to ContributorPage
    }
    
    @Test
    void loadGooglePageSuccess(){
        to GooglePage
    }
    
}

