<?php
/**
 *Component to handle errors
 *
 */
class ErrorComponent extends Component
{
	/**
	 * This is a name of $components   used in  ErrorComponent
	 */
	public $components = array('Session');

	/**
	 * To set error set flash message
	 * @param $erros
	 */
	public function set( $erros)
	{
	 //check if $erros is not empty show the setFlash message
		if ( !empty($erros) )
		{	
			$html = '<ul>';
			foreach ( $erros as $e )
			{
				$html .= '<li>'.$e[0].'</li>';
			}
			$html .= '</ul>';

			$this->Session->setFlash($html, 'flash_fail');
		}
	}
}
?>