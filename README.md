A simple plugin for adding a quick login layer over a dev/staging site (sep from Auth).

## Installation

* Clone/Copy the files in this directory into `app/Plugin/BetaBlocker`
* Ensure the plugin is loaded in `app/Config/bootstrap.php` by calling `CakePlugin::load('BetaBlocker');`
* Add a route to main `app/Config/routes.php`:
   * `Router::connect('/access', array('plugin'=>'beta_blocker', 'controller' => 'BetaBlockerAccess', 'action' => 'index'));`
* Add to your beforeFilter in `AppController.php` (make sure the redirect matches your route set above):
    * `if (!$this->Session->check('BetaBlocker.user') && $this->here != '/access') { return $this->redirect('/access'); }`
* In `BetaBlockerAccessController.php` replace "your-secret-password" with the the password/phrase you'd like vistors to use to gain access.