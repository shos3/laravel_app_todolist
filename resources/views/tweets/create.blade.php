<form method="POST" action="{{ route('tweet_save') }}">
  @csrf
  <label for="text">Tweet内容:</label>
  <textarea name="text" id="text" rows="3"></textarea>

  <button type="submit">Tweetする</button>
</form>