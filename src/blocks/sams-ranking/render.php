<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */

 use SAMSPlugin\RankingFetcher;

if (isset($attributes)
	&& isset($attributes['apiKey'])
	&& isset($attributes['associationUrl'])
	&& isset($attributes['matchSeriesId'])) {

	$fetcher = new RankingFetcher();
	$ranking = $fetcher->fetch($attributes['associationUrl'], $attributes['apiKey'], $attributes['matchSeriesId']);
?>

<div <?php echo get_block_wrapper_attributes(); ?>>
<table class="sams-ranking">
    <th class="rank"><?php esc_html_e('Rank', 'sams-plugin'); ?></th>
    <th class="teamName"><?php esc_html_e('Team', 'sams-plugin'); ?></th>
    <th class="games"><?php esc_html_e('Games', 'sams-plugin'); ?></th>
    <th class="balls"><?php esc_html_e('Balls', 'sams-plugin'); ?></th>
    <th class="sets"><?php esc_html_e('Sets', 'sams-plugin'); ?></th>
    <th class="points"><?php esc_html_e('Points', 'sams-plugin'); ?></th>

	<?php foreach ($ranking->rankingEntries as $entry) { ?>

	<tr>
		<td class="rank"><?php echo $entry->place; ?></td>
		<td class="teamName"><?php echo $entry->teamName; ?></td>
		<td class="games"><?php echo $entry->games; ?></td>
		<td class="balls"><?php echo $entry->ballsPro . ':' . $entry->ballsCon; ?></td>
		<td class="sets"><?php echo $entry->setsPro . ':' . $entry->setsCon; ?></td>
		<td class="points"><?php echo $entry->points; ?></td>
	</tr>

	<?php };?>
	</table>

<?php
} else {
	// Display error message on invalid configuration
	esc_html_e('Error in SAMS Ranking: Configuration missing or incomplete', 'sams-plugin');
}
	?>

</div>
