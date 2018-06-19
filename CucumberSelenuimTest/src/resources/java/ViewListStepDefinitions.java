package resources.java;

import cucumber.api.java.After;
import cucumber.api.java.Before;
import cucumber.api.java.en.Given;
import cucumber.api.java.en.Then;
import cucumber.api.java.en.When;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

import java.util.concurrent.TimeUnit;


public class ViewListStepDefinitions {

	private WebDriver driver = null;

	@Before("@web")
	public void setup() {
		System.setProperty("webdriver.chrome.driver", "./chromedriver.exe");
		driver = new ChromeDriver();
	}

	@After("@web")
	public void cleanup() {
		driver.close();
	}
	
	@Given("^User is on homepage$")
	public void user_is_on_Home(){
		driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
		driver.get("http://hauss.web-commerce.eu/");
	}
	
	@When("^User clicks on \"([^\"]*)\"$")
	public void user_clicks_on(String arg1){
		driver.findElement(By.xpath("//*[@id='bs-example-navbar-collapse-1']/ul/li[2]/a")).click();
	}
	
	@Then("^User should be shown the Cocktails$")
	public void user_should_be_shown_the_Cocktails(){
		String statusMessageText = driver.findElement(By.xpath("//*[@id='mi-list']/tbody/tr[1]/td[1]/a")).getText();
		//assertEquals("Cocktails",statusMessageText,"");
	}
	
	@Given("^User is on Listpage2$")
	public void user_is_on_Listpage(){ 
		driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
		driver.get("http://hauss.web-commerce.eu/cocktails/");
	}
	
	@When("^User enters \"([^\"]*)\"$")
	public void user_enters(String arg1){
		driver.findElement(By.xpath("//*[@id=\"mi-list_filter\"]/label/input")).sendKeys(arg1);
	}
	
	@Then("^User should be shown the recipe\\(s\\) for \"([^\"]*)\"$")
	public void user_should_be_shown_the_recipe_s_for(String arg1){
		driver.findElement(By.xpath("//*[@id=\"mi-list\"]/tbody/tr/td[1]/a"));	
	}
}
