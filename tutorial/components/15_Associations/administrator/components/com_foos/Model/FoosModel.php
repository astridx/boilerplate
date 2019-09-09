<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_foos
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Component\Foos\Administrator\Model;

defined('_JEXEC') or die;

use Joomla\CMS\Language\Associations;
use Joomla\CMS\MVC\Model\ListModel;

/**
 * Methods supporting a list of foo records.
 *
 * @since  1.0
 */
class FoosModel extends ListModel
{
	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @see     \JControllerLegacy
	 * @since   1.0
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
	}
	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return  \JDatabaseQuery
	 *
	 * @since   1.0
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		// Select the required fields from the table.
		$query->select(
			$db->quoteName(array('a.id', 'a.name', 'a.catid', 'a.access', 'a.published', 'a.publish_up', 'a.publish_down', 'a.language'))
		);

		// Select the required fields from the table.
		$query->select(
			$db->quoteName(
				explode(
					', ',
					$this->getState(
						'list.select',
						'a.id, a.name, a.catid' .
						', a.access' .
						', a.language' .
						', a.published' .
						', a.publish_up, a.publish_down'
					)
				)
			)
		);

		$query->from($db->quoteName('#__foos_details', 'a'));

		// Join over the asset groups.
		$query->select($db->quoteName('ag.title', 'access_level'))
			->join(
				'LEFT',
				$db->quoteName('#__viewlevels', 'ag') . ' ON ' . $db->quoteName('ag.id') . ' = ' . $db->quoteName('a.access')
			);

		// Join over the categories.
		$query->select($db->quoteName('c.title', 'category_title'))
			->join(
				'LEFT',
				$db->quoteName('#__categories', 'c') . ' ON ' . $db->quoteName('c.id') . ' = ' . $db->quoteName('a.catid')
			);

		// Join over the language
		$query->select($db->quoteName('l.title', 'language_title'))
			->select($db->quoteName('l.image', 'language_image'))
			->join(
				'LEFT',
				$db->quoteName('#__languages', 'l') . ' ON ' . $db->quoteName('l.lang_code') . ' = ' . $db->quoteName('a.language')
			);

		// Join over the associations.
		$assoc = Associations::isEnabled();

		if ($assoc)
		{
			$query->select('COUNT(' . $db->quoteName('asso2.id') . ') > 1 as ' . $db->quoteName('association'))
				->join(
					'LEFT',
					$db->quoteName('#__associations', 'asso') . ' ON ' . $db->quoteName('asso.id') . ' = ' . $db->quoteName('a.id')
					. ' AND ' . $db->quoteName('asso.context') . ' = ' . $db->quote('com_foos.item')
				)
				->join(
					'LEFT',
					$db->quoteName('#__associations', 'asso2') . ' ON ' . $db->quoteName('asso2.key') . ' = ' . $db->quoteName('asso.key')
				)
				->group(
					$db->quoteName(
						array(
							'a.id',
							'a.name',
							'a.catid',
							'a.published',
							'a.access',
							'a.language',
							'a.publish_up',
							'a.publish_down',
							'l.title' ,
							'l.image' ,
							'ag.title' ,
							'c.title'
						)
					)
				);
		}

		// Filter on the language.
		if ($language = $this->getState('filter.language'))
		{
			$query->where($db->quoteName('a.language') . ' = :language');
			$query->bind(':language', $language);
		}

		return $query;
	}
}

