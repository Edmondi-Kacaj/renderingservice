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
class Phools_Net_Smtp_Header_AddressList
extends Phools_Net_Smtp_Header_Abstract
{

	/**
	 *
	 * @param string $Name
	 * @param array $Addresses
	 */
	public function __construct($Name, array $Addresses = array())
	{
		parent::__construct($Name);

		foreach( $Addresses as $Address )
		{
			$this->addAddress($Address);
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see Phools_Net_Smtp_Header_Abstract::__destruct()
	 */
	public function __destruct()
	{
		$this->Addresses = null;
	}

	public function write(Phools_Net_Smtp_Writer_Interface $Formatter)
	{
		return $Formatter->writeHeaderAddressList($this->getName(), $this->getAddresses());
	}

	/**
	 *
	 * @var array
	 */
	private $Addresses = array();

	/**
	 *
	 * @param Phools_Net_Smtp_Address_Address $Address
	 */
	public function addAddress(Phools_Net_Smtp_Address_Interface $Address)
	{
		$this->Addresses[] = $Address;
		return $this;
	}

	/**
	 *
	 * @return array
	 */
	protected function getAddresses()
	{
		return $this->Addresses;
	}

}
