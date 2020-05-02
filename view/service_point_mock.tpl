{if $mock_disable_reason}
    <h2>Генерация невозможна:</h2>
    <p>{$mock_disable_reason}</p>
{else}
    <form method="post">
        <label for="mock-count">Сколько:</label>
        <input id="mock-count" type="number" name="count" value="{$count}">
        <button type="submit">Создать</button>
    </form>
{/if}