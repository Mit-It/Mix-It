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


public class ViewDetailStepDefinitions {

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
	
	@Given("^User is on Listpage$")
	public void user_is_on_Listpage(){
		driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
		driver.get("http://hauss.web-commerce.eu/cocktails/");
	}

	@When("^User clicks on Caipiriha$")
	public void user_clicks_on_Caipiriha(){
	    driver.findElement(By.xpath("//*[@id='mi-list']/tbody/tr[1]/td[1]/a")).click();
	}

	@Then("^User should be shown the Title$")
	public void user_should_be_shown_the_Title(){
		driver.findElement(By.xpath("/html/body/div/main/div/div/div/div[1]/div/div[1]/h2"));
	}

	@Then("^a descrition$")
	public void a_descrition(){
		driver.findElement(By.xpath("/html/body/div/main/div/div/div/div[2]/p[1]"));
	}

	@Then("^the recipe$")
	public void the_recipe(){
		driver.findElement(By.xpath("/html/body/div/main/div/div/div/div[2]/div/p"));
	}

	@Given("^User is on Caipiriha page$")
	public void user_is_on_Caipiriha_page(){
		driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
		driver.get("http://hauss.web-commerce.eu/cocktails/");
	    driver.findElement(By.xpath("//*[@id='mi-list']/tbody/tr[1]/td[1]/a")).click();
	}

	@When("^User clicks on Arrow Right$")
	public void user_clicks_on_Arrow_Right(){
		driver.findElement(By.xpath("/html/body/div/main/div[1]/ol/li[2]/a")).click();
	}

	@Then("^User should be shown the next picture$")
	public void user_should_be_shown_the_next_picture(){
	   driver.findElement(By.xpath("/html/body/div/main/div[1]/div/ul")).getCssValue("transform");
	}



}
