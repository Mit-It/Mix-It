package resources.java;

import static org.junit.Assert.*;

import java.util.concurrent.TimeUnit;

import org.junit.Test;
import org.junit.runner.RunWith;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.firefox.FirefoxDriver;

import cucumber.api.PendingException;
import cucumber.api.java.After;
import cucumber.api.java.Before;
import cucumber.api.java.en.Given;
import cucumber.api.java.en.Then;
import cucumber.api.java.en.When;

public class ViewDetailStepDefinitions {

	private static WebDriver driver = null;

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
	public void user_is_on_Listpage() throws Throwable {
		driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
		driver.get("http://hauss.web-commerce.eu/cocktails/");
	}

	@When("^User clicks on Caipiriha$")
	public void user_clicks_on_Caipiriha() throws Throwable {
	    driver.findElement(By.xpath("//*[@id='mi-list']/tbody/tr[1]/td[1]/a")).click();
	}

	@Then("^User should be shown the Title$")
	public void user_should_be_shown_the_Title() throws Throwable {
		String statusMessageText = driver.findElement(By.xpath("/html/body/div/main/div/div/div/div[1]/div/div[1]/h2")).getText();
	}

	@Then("^a descrition$")
	public void a_descrition() throws Throwable {
		String statusMessageText = driver.findElement(By.xpath("/html/body/div/main/div/div/div/div[2]/p[1]")).getText();
	}

	@Then("^the recipe$")
	public void the_recipe() throws Throwable {
		String statusMessageText = driver.findElement(By.xpath("/html/body/div/main/div/div/div/div[2]/div/p")).getText();
	}

	@Given("^User is on Caipiriha page$")
	public void user_is_on_Caipiriha_page() throws Throwable {
		driver.manage().timeouts().implicitlyWait(10, TimeUnit.SECONDS);
		driver.get("http://hauss.web-commerce.eu/cocktails/");
	    driver.findElement(By.xpath("//*[@id='mi-list']/tbody/tr[1]/td[1]/a")).click();
	}

	@When("^User clicks on Arrow Right$")
	public void user_clicks_on_Arrow_Right() throws Throwable {
		driver.findElement(By.xpath("/html/body/div/main/div[1]/ol/li[2]/a")).click();
	}

	@Then("^User should be shown the next picture$")
	public void user_should_be_shown_the_next_picture() throws Throwable {
	    String test = driver.findElement(By.xpath("/html/body/div/main/div[1]/div/ul")).getCssValue("transform");
	    System.out.println(test);
	}

	@Given("^User opened Detail page of \"([^\"]*)\"$")
	public void user_opened_Detail_page_of(String arg1) throws Throwable {
	    // Write code here that turns the phrase above into concrete actions
	    throw new PendingException();
	}

	@Then("^User should not be shown a new Picture$")
	public void user_should_not_be_shown_a_new_Picture() throws Throwable {
	    // Write code here that turns the phrase above into concrete actions
	    throw new PendingException();
	}



}
