<?php
// src/Phytoscope/UserBundle/PhytoscopeUserBundle.php

namespace Phytoscope\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PhytoscopeUserBundle extends Bundle
{
	public function getParent()
	{
		return '';//FOSUserBundle';
	}
}
