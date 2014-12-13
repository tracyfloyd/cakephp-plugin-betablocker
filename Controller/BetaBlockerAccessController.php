<?php
class BetaBlockerAccessController extends BetaBlockerAppController
{
	var $components = array('Session', 'RequestHandler');

	// =====================================================================================================
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('index');
		// $this->Auth->autoRedirect = false;
	}

	// =====================================================================================================
	function index()
	{
		if (isset($this->params['url']['exit'])) {
			$this->Session->delete('BetaBlocker.user');
			return $this->redirect('/');
		}

		if ($this->request->data) {
			if ($this->request->data['BetaBlocker']['secret'] == 'your-secret-password') {
				$this->Session->write('BetaBlocker.user', time());
				return $this->redirect('/');
			}
		}

	}


} # End class AccessController