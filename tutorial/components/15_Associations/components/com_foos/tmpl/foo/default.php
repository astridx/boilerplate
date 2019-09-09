<?php

defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

if ($this->get('State')->get('params')->get('show_foo_name_label')) {
	echo Text::_('COM_FOOS_NAME') . $this->item->name;
} else {
	echo $this->item->name;
}
echo $this->item->event->afterDisplayTitle; 
echo $this->item->event->beforeDisplayContent;
echo $this->item->event->afterDisplayContent;