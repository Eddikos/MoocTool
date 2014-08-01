class FriendRequest < ActiveRecord::Base
  belongs_to :to, class_name: "User"
  belongs_to :from, class_name: "User"

  def accept
    from.friendships.create(friend: to)
    destroy
  end
end
