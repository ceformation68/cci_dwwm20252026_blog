	{if ($success_message != '')}
		<div class="alert alert-success">
			<p>{$success_message}</p>
		</div>
	{/if}
	
	{if (isset($arrError) && count($arrError) > 0) }
		<div class="alert alert-danger">
		{foreach $arrError as $strError}
			<p>{$strError}</p>
		{/foreach}
		</div>
	{/if}
	
