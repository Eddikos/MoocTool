class Friendship < ActiveRecord::Base
  belongs_to :user, counter_cache: :friends_count
  belongs_to :friend, class_name: "User", counter_cache: false
  has_one :mutual_friendship, class_name: "Friendship", foreign_key: "mutual_friendship_id"

  after_create :make_mutual
  before_destroy :remove_mutual

  private
  def make_mutual
    return if mutual_friendship
    create_mutual_friendship(user: friend, friend: user, mutual_friendship: self)
  end

  def remove_mutual
    return unless mutual_friendship
    User.decrement_counter :friends_count, mutual_friendship.user_id
    mutual_friendship.delete
  end
end
