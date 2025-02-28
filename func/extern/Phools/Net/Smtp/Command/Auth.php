<?php

/*
 * This product Copyright 2010 metaVentis GmbH.  For detailed notice,
 * see the "NOTICE" file with this distribution.
 *
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 */

/**
 *
 *
 *
 */
class Phools_Net_Smtp_Command_Auth
extends Phools_Net_Smtp_Command_Abstract
{

	/**
	 *
	 * @param string $Mechanism
	 */
	public function __construct($Mechanism)
	{
		$this->setMechanism($Mechanism);
	}

	public function __destruct()
	{
		$this->Mechanism = null;

		parent::__destruct();
	}

	/**
	 * (non-PHPdoc)
	 * @see Phools_Net_Smtp_Command_Interface::send()
	 */
	public function send(Phools_Stream_Output_Interface &$Output)
	{
		$Data = 'AUTH ' . $this->getMechanism();
		$Output->write($Data . Phools_Net_Smtp_Command_Interface::CRLF);

		return $this;
	}

	/**
	 *
	 * @var string
	 */
	private $Mechanism = '';

	/**
	 *
	 * @param string $Name
	 */
	public function setMechanism($Name)
	{
		$this->Mechanism = (string) $Name;
		return $this;
	}

	/**
	 *
	 * @return string
	 */
	public function getMechanism()
	{
		return $this->Mechanism;
	}

}
