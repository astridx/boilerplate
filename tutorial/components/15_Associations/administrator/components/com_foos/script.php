<?php

/**
 * @package    [PACKAGE_NAME]
 *
 * @author     [AUTHOR] <[AUTHOR_EMAIL]>
 * @copyright  [COPYRIGHT]
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       [AUTHOR_URL]
 */
// No direct access to this file
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Log\Log;

/**
 * Script file of Foo Component
 *
 * @since  1.0.0
 *
 */
class FoosInstallerScript
{
	/**
	 * Extension script constructor.
	 *
	 * @since  1.0.0
	 *
	 */
	public function __construct()
	{
		$this->minimumJoomla = '4.0';
		$this->minimumPhp = JOOMLA_MINIMUM_PHP;
	}

	/**
	 * Method to install the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 *
	 */
	public function install($parent)
	{
		echo Text::_('COM_FOOS_INSTALLERSCRIPT_UNINSTALL');

		return true;
	}

	/**
	 * Method to uninstall the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 *
	 */
	public function uninstall($parent)
	{
		echo Text::_('COM_FOOS_INSTALLERSCRIPT_UNINSTALL');

		return true;
	}

	/**
	 * Method to update the extension
	 *
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 *
	 */
	public function update($parent)
	{
		echo Text::_('COM_FOOS_INSTALLERSCRIPT_UPDATE');

		return true;
	}

	/**
	 * Function called before extension installation/update/removal procedure commences
	 *
	 * @param   string            $type    The type of change (install, update or discover_install, not uninstall)
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 *
	 */
	public function preflight($type, $parent)
	{
		// Check for the minimum PHP version before continuing
		if (!empty($this->minimumPhp) && version_compare(PHP_VERSION, $this->minimumPhp, '<'))
		{
			Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_PHP', $this->minimumPhp), Log::WARNING, 'jerror');

			return false;
		}

		// Check for the minimum Joomla version before continuing
		if (!empty($this->minimumJoomla) && version_compare(JVERSION, $this->minimumJoomla, '<'))
		{
			Log::add(Text::sprintf('JLIB_INSTALLER_MINIMUM_JOOMLA', $this->minimumJoomla), Log::WARNING, 'jerror');

			return false;
		}

		echo Text::_('COM_FOOS_INSTALLERSCRIPT_PREFLIGHT');

		return true;
	}

	/**
	 * Function called after extension installation/update/removal procedure commences
	 *
	 * @param   string            $type    The type of change (install, update or discover_install, not uninstall)
	 * @param   InstallerAdapter  $parent  The class calling this method
	 *
	 * @return  boolean  True on success
	 *
	 * @since  1.0.0
	 *
	 */
	public function postflight($type, $parent)
	{
		echo Text::_('COM_FOOS_INSTALLERSCRIPT_POSTFLIGHT');

		return true;
	}
}
