<?php
require_once("/../Api.php"); 
class ApiTest extends \PHPUnit_Framework_TestCase
{		public $test;
		
		/*public function setUp(){
			
			$this->test=new Api();
			
		}*/
		/*public function testExiteUsuario(){
			$user="jperez";
			$true=TRUE;
			$existe=$this->test->existeUsuario($user);
			$this->assertEquals($TRUE, $existe);
		}*/
		public function testSomeApiThing()
	{
			$response = $this->call('GET', '/servicios/usuarios');
			
			$this->assertEquals(200, $response->getStatusCode());
			$data = json_decode($response->getContent());
			$this->assertInternalType('array', $data, 'Invalid JSON');
			// do assertions against data...
			//$id = $data['something']['id'];

			/*$response = $this->call('post', 'api/v1/bar/baz/'.$id);
			$this->assertEquals(200, $response->getStatusCode());
			$data = json_decode($response->getContent());
			$this->assertInternalType('array', $data, 'Invalid JSON');
			// do more assertions against data*/
	}
		


}

?>