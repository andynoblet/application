<?php

	Namespace Application\Module\XML\Model
	{
		Class XML Extends \Application\Core\Model
		{
			Public Function __Construct()
			{
				
			}

			Public Function Create($Data = Null)
			{
				// $Data = New Data\Model\Data($Data);
				
				$Data = $this->Model("Data")->Load($Data);
				
				Return $Data;
			}
			
			Public Function Edit($Data = Null)
			{
				
			}
			
			Public Function Delete($Data = Null)
			{
				
			}
			
		}
	}

?>